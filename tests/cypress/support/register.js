import { fillTextInput } from "./utils/component";
import { random } from "./utils/random";

export const selectors = {
    email: '#email',
    fullName: '#fullName',
    username: '#username',
    password: '#password',
    confirmPassword: '#confirmPassword',
    createAccountButton: '[data-test=createAccount]',
};

export function fillRegistrationForm(registrationInfo) {
    fillTextInput(selectors.email, registrationInfo.email);
    fillTextInput(selectors.fullName, registrationInfo.fullName);
    fillTextInput(selectors.username, registrationInfo.username);
    fillTextInput(selectors.password, registrationInfo.password);
    fillTextInput(selectors.confirmPassword, registrationInfo.confirmPassword);
}

export function submitRegistrationForm() {
    cy.get(selectors.createAccountButton).click();
    cy.contains('A confirmation code has been sent. Please check your email!');
}

export function generateRegistrationInfo() {
    const password = random.getPassword();
    return {
        email: random.getEmail(),
        fullName: random.getFullName(),
        username: random.getUsername(),
        password,
        confirmPassword: password,
    }
}