export default class ErrorResponse {
    constructor(data) {
        this.code = 500
        this.message = ''
        this.exception = ''

        if (data) {
            this.fromData(data)
        }
    }

    fromData(data) {
        this.code = data.status
        this.message = data.message
        this.exception = data.exception
    }

    formatted() {
        return `Error: ${this.message}. Exception: ${this.exception}`
    }
}