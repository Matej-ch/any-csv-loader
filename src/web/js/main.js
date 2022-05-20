document.addEventListener('DOMContentLoaded', () => {

    const delay = require('lodash/delay');

    document.querySelector('body').addEventListener('click', loadCsvMap);

    document.querySelector('body').addEventListener('click', saveCsvMap);

    document.querySelector('body').addEventListener('click', showMoreRows);

    document.querySelector('body').addEventListener('click', loadFile);

    document.querySelector('body').addEventListener('click', loadFile);

    document.querySelector('body').addEventListener('input', e => {
        if (e.target.classList.contains('.js-url-input')) {
            loadColumnsAndPreview()
        }
    });

    document.querySelector('body').addEventListener('paste', e => {
        if (e.target.classList.contains('.js-url-input')) {
            loadColumnsAndPreview()
        }
    });

    document.querySelector('body').addEventListener('change', e => {
        if (e.target.classList.contains('.js-file-input')) {
            loadColumnsAndPreview()
        }
    });

    function loadColumnsAndPreview() {

    }

    function loadCsvMap(e) {
        if (e.target.id !== 'js-load-map') {
            return false;
        }

        e.preventDefault();

        fetch('/').then(res => res.json()).then(data => {
        }).catch(err => console.error(err));
    }

    function saveCsvMap(e) {
        if (e.target.id !== 'js-save-map') {
            return false;
        }

        e.preventDefault();

        fetch('/').then(res => res.json()).then(data => {
        }).catch(err => console.error(err));
    }

    function showMoreRows(e) {
        if (e.target.id !== 'js-load-preview') {
            return false;
        }

        e.preventDefault();

        fetch('/').then(res => res.json()).then(data => {
        }).catch(err => console.error(err));
    }

    function loadFile(e) {
        if (e.target.id !== 'js-load-file') {
            return false;
        }

        e.preventDefault();

        fetch('/').then(res => res.json()).then(data => {
        }).catch(err => console.error(err));
    }

})

