import ErrorResponse from "../http/responses/ErrorResponse";

export function mapRawToResponse(rawResponse) {
    return new ErrorResponse(rawResponse.response.data)
}