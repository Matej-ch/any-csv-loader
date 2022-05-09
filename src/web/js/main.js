document.addEventListener('DOMContentLoaded', () => {

    document.querySelector('body').addEventListener('click', loadCsvMap);

    document.querySelector('body').addEventListener('click', saveCsvMap);

    document.querySelector('body').addEventListener('click', showMoreRows);

    document.querySelector('body').addEventListener('click', loadFile);

    function loadCsvMap(e) {
        if (e.target.id !== 'js-load-map') {
            return false;
        }

        e.preventDefault();

        fetch('/').then(res => res.json()).then(data => {}).catch(err => console.error(err));
    }

    function saveCsvMap(e) {
        if (e.target.id !== 'js-save-map') {
            return false;
        }

        e.preventDefault();

        fetch('/').then(res => res.json()).then(data => {}).catch(err => console.error(err));
    }

    function showMoreRows(e) {
        if (e.target.id !== 'js-load-preview') {
            return false;
        }

        e.preventDefault();

        fetch('/').then(res => res.json()).then(data => {}).catch(err => console.error(err));
    }

    function loadFile(e) {
        if (e.target.id !== 'js-load-file') {
            return false;
        }

        e.preventDefault();

        fetch('/').then(res => res.json()).then(data => {}).catch(err => console.error(err));
    }

})

