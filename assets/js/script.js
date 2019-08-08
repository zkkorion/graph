document.addEventListener('DOMContentLoaded', ()=>
{
    const forms = document.querySelectorAll('.fileForm');
    let graphContainer = document.querySelector('#graph');
    let fileInput = document.querySelector('.fileForm__fileInput');
    let dropArea = document.querySelector('.dropArea');
    let data;
    fileInput.style.display = 'none';
    
    ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName =>
    {
        dropArea.addEventListener(eventName, (e) => 
        {
            e.preventDefault();
            e.stopPropagation();
        });
    });
    DropHandler = (e) => 
    {
        let file = e.dataTransfer.files[0];
        if(file.type !== 'text/html')
            dropArea.textContent = 'Неверный формат файла. Требуется файл формата html';
        else
        {
            data = file;
            dropArea.textContent = file.name;
        }
    }
    Highlight = (e) => dropArea.classList.add('highlight');
    Unhighlight = (e) => dropArea.classList.remove('highlight');
    ['dragenter', 'dragover'].forEach(eventName => dropArea.addEventListener(eventName, Highlight));
    ['dragleave', 'drop'].forEach(eventName => dropArea.addEventListener(eventName, Unhighlight));
    dropArea.addEventListener('drop', DropHandler);
    dropArea.addEventListener('click', ()=>fileInput.click());
    fileInput.addEventListener('change', (e)=>dropArea.textContent = e.target.files[0].name);

    MakeChart = (datasource) =>
    {
        graphContainer.innerHTML = '';
        let chart = new Taucharts.Chart(
        {
            data: datasource,
            type: 'line',
            x: "ticket's number",
            y: 'balance',
            color: 'type',
            plugins: [/*Taucharts.api.plugins.get('legend')(), */Taucharts.api.plugins.get('tooltip')()]
        });
        chart.renderTo(graphContainer);
    }

    FormSubmitHandler = (event) =>
    {
        event.preventDefault();
        const form = event.target;
        const url = form.action;
        const formData  = new FormData(form);
        if(data !== undefined)
            formData.append('graphData', data);
		fetch(url, {method: 'POST', body: formData}).then(response =>
		{
			if(response.status === 200)
			    return response.json();
            else
                return 'error: ${response.status}';
        })
        .then(json =>
        {
            MakeChart(json);
            form.reset();
        });
    }
    [...forms].forEach(form =>form.addEventListener("submit", FormSubmitHandler));
    
});