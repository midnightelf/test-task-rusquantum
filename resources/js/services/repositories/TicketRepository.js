import { mapRawToResponse } from "@/services/functions/response.js"
import http from "@/services/http/http.js";
import Ticket from "@/services/classes/Ticket.js";

const endpoints = {
    index: '/api/ticket',
    store: '/api/ticket',
}

export default {
    async index() {
        const response = http.get(endpoints.index)

        return response.data.map(t => new Ticket(t))
    },

    async store(ticket) {
        try {
            const rawResponse = await http.post(endpoints.store, Ticket.resolveRequestData(ticket))
            return new Ticket(rawResponse.data)
        } catch (e) {
            return mapRawToResponse(e)
        }
    },
}