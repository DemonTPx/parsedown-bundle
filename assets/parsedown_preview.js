class ParsedownPreview {
    constructor(element) {
        const data = element.dataset;

        this.url = data.url;
        this.input = element.querySelector(data.input || 'textarea');
        this.preview = element.querySelector(data.preview || '.preview');

        const trigger = element.querySelector(data.trigger || '.trigger');
        if (trigger) {
            trigger.addEventListener('click', () => this.loadPreview());
        }
    }

    loadPreview() {
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
}

// export default ParsedownPreview;
module.exports = ParsedownPreview;
