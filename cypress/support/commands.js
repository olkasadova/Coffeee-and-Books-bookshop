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
    cy.get ('[data-cy = "confirmPassword"]').click (confirmPassword)
    cy.get ('[data-cy = "reg-submit"]').click ()
     })  