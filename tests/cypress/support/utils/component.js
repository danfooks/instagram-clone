export function fillTextInput(selector, inputString) {
    if (inputString) {
        cy.get(selector).focus().clear().type(inputString, { delay: 1 }).blur();
        validateInput(selector, inputString);
    }
}

export function validateInput(selector, text) {
    text && cy.get(selector).should('have.value', text);
}