export function collectFormData(form) {
    return Object.fromEntries(
        new FormData(form).entries()
    )
}