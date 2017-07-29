export default class ParsedownPreview {
    constructor(element) {
        const data = element.dataset;

        this.url = data.url;
        this.input = element.querySelector(data.input || 'textarea');
        this.preview = element.querySelector(data.preview || '.preview');

        this.preFetchCallbacks = [];

        const trigger = element.querySelector(data.trigger || '.trigger');
        if (trigger) {
            trigger.addEventListener('click', () => this.loadPreview());
        }
    }

    loadPreview() {
        for (let callback of this.preFetchCallbacks) {
            callback(this.input);
        }

        this.preview.innerHTML = '<div align="center"><i class="fa fa-spinner fa-spin fa-4x"></i></div>';

        fetch(this.url, {
            method: 'post',
            body: this.input.value
        })
            .then((response) => {
                return response.text();
            })
            .then((text) => {
                this.preview.innerHTML = text;
            })
            .catch((error) => {
                this.preview.innerHMTL = '<div class="alert alert-error">error</div>';
            })

    }

    addPreFetchCallback(callback) {
        this.preFetchCallbacks.push(callback);
    }
}
