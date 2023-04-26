import { NavigationTimeout } from "./constants"; 

export const routes = {
    feed: 'feed',
    login: 'login',
    register: 'register'
}

export function navigate(route) {
    cy.visit(`/${route}.php`, { NavigationTimeout });
}
