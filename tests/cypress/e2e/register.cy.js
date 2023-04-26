const { login } = require("../support/login");
const { verifyNavigationBarIsLoaded } = require("../support/navbar");
const { routes, navigate } = require("../support/utils/navigation");

describe('Registration Functional Tests', () => {

  beforeEach(() => navigate(routes.register));

  it('User can successfully register for a new account', () => {
    fillRegistraitonForm(generateRegistrationInfo());
    submitRegistrationForm();
  })

  it('User can\'t login with invalid credentials', () => {
    login('invalidUser@gmail.com');
    cy.contains('Incorrect Email or Password');
  })
});
