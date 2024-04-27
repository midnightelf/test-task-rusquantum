export default class Ticket {
    constructor(data) {
        this.id = 0
        this.username = ''
        this.phone = ''
        this.message = ''

        if (data) {
            this.fromData(data)
        }
    }

    fromData(data) {
        this.id = data.id
        this.username = data.username
        this.phone = data.phone
        this.message = data.message
    }

    toString() {
        return `Ticket (${this.id}) from ${this.username}. message: "${this.message}"`
    }

    static resolveRequestData(data) {
        let requestBody = {
            username: data.username,
            phone: data.phone,
            message: data.message,
            connection: data.connection
        };
        let formData = new FormData();

        Object.entries(requestBody).forEach(([key, value]) => {
            formData.append(key, value);
        });

        return formData;
    }
}