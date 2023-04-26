export const selectors = {
    navigationBar: '[data-test=navigationBar]',
    searchButton: '[data-test=searchButton]',
}

export function verifyNavigationBarIsLoaded() {
    cy.get(selectors.navigationBar).should('exist');
    cy.get(selectors.searchButton).should('exist');
};