const { login } = require("../support/login");
const { verifyNavigationBarIsLoaded } = require("../support/navbar");
const { routes, navigate } = require("../support/utils/navigation");

describe('Login Page Functional Tests', () => {

  beforeEach(() => navigate(routes.login));

  it('User can successfully login with valid credentials', () => {
    login();
    verifyNavigationBarIsLoaded();
  })

  it('User can\'t login with invalid credentials', () => {
    login('invalidUser@gmail.com');
    cy.contains('Incorrect Email or Password');
  })
});
