const { defineConfig } = require("cypress");

module.exports = defineConfig({
  e2e: {
    viewportHeight: 1080,
    viewportWidth: 1920,
    setupNodeEvents(on, config) {
      // implement node event listeners here
    },
    baseUrl: 'http://elvis.rowan.edu/~fooksd3/instagram/instagram-clone/'
  },
  env: {
    email: 'danfooks+qa@icloud.com',
    password: 'password',
  }
});
