const { fillRegistrationForm, generateRegistrationInfo, submitRegistrationForm } = require("../support/register");
const { routes, navigate } = require("../support/utils/navigation");

describe('Registration Functional Tests', () => {

  beforeEach(() => navigate(routes.register));

  it('User can successfully register for a new account', () => {
    fillRegistrationForm(generateRegistrationInfo());
    submitRegistrationForm();
  })
});
