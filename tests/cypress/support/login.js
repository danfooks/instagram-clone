import { fillTextInput } from "./utils/component";

export const selectors = {
    email: '#email',
    password: '#password',
    loginButton: '#logIn',
};

const defaultEmail = Cypress.env('email');
const defaultPassword = Cypress.env('password');

export function login(email = defaultEmail, password = defaultPassword) {
    fillTextInput(selectors.email, email);
    fillTextInput(selectors.password, password);
    cy.get(selectors.loginButton).click();
};
