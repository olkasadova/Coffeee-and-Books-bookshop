// ***********************************************
// This example commands.js shows you how to
// create various custom commands and overwrite
// existing commands.
//
// For more comprehensive examples of custom
// commands please read more here:
// https://on.cypress.io/custom-commands
// ***********************************************
//
//
// Login function with existing user-
Cypress.Commands.add('login', (email, password) => { 
    cy.get ('[data-cy = "login-email"]').type (email)
    cy.get ('[data-cy = "login-passowrd"]').type (password)
    cy.get ('[data-cy = "login-submit"]').click ()
        })
//function to click a link
Cypress.Commands.add('clickLink', (label) => {
    cy.get('a').contains(label).click()
})

  //function to register user
  Cypress.Commands.add('register', (firstName, lastName, email, password, confirmPassword) => { 

    cy.get ('[data-cy = "first-name"]').type (firstName)
    cy.get ('[data-cy = "last-name"]').type (lastName)
    cy.get ('[data-cy = "reg-email"]').type (email)
    cy.get ('[data-cy = "reg-password"]').type (password)
    cy.get ('[data-cy = "confirmPassword"]').type (confirmPassword)
    cy.get ('[data-cy = "reg-submit"]').click ()
     })  

      //function to register user
  Cypress.Commands.add('register_random', () => { 
    //generate a random data for registering a user
    const uuid = () => Cypress._.random (0, 1e6)
    const id = uuid()
    const firstname = `testFirstname${id}`
    const lastname = `testLastname${id}`
    //generate a 5-symbol random password (took a number value), could be rewritten to alpha-numberic


    cy.log ("Random user name is " + firstname + " " + lastname)
    cy.get ('[data-cy = "first-name"]').type (firstname) 
    cy.get ('[data-cy = "last-name"]').type (lastname)
    cy.get ('[data-cy = "reg-email"]').type (lastname + '@test.com')
    cy.get ('[data-cy = "reg-password"]').type (id)
    cy.get ('[data-cy = "confirmPassword"]').type (id)

    cy.log (id)
    cy.get ('[data-cy = "reg-submit"]').click ()
     })  