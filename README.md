# Products Management

A web app used to manage (add, delete and list) products for eCommerce app.

[Live Version]()

## The expected outcome of the test

A web-app (accessible by an URL) containing two pages for:

1. Product list page
2. Adding a product page

## Coding Requirements

These are the listed mandatory technical requirements:

- Utilize **OOP principles** to handle differences in type logic/behavior
  - Procedural PHP code is allowed exclusively to initialize your PHP classes. Rest logic should be placed within class methods.
  - For OOP you would need to demonstrate code structuring in meaningful classes that extend each other, so we would like to see an abstract class for the main product logic. Please take a look at the polymorphism provision.
  - Also, MySQL logic should be handled by objects with properties instead of direct column values. Please use setters and getters for achieving this and don't forget to use them for both save and display logic.
- Meet PSR standards ([https://www.php-fig.org](https://www.php-fig.org/))
- Avoid using conditional statements for handling differences in product types
  - This means you should avoid any if-else and switch-case statements which are used to handle any difference between products.
- Do not use different endpoints for different products types. There should be 1 general endpoint for product saving
- PHP: ^7.0, plain classes, no frameworks, OOP approach [USED]
- jQuery: optional 
- jQuery-UI: prohibited 
- Bootstrap: optional [USED]
- SASS: advantage 
- MySQL: ^5.6 obligatory [USED]

NOTE:

- React and vue.js is a huge advantage if you decide to use them for the frontend part, but not a requirement

## Functional Requirements

### 1. Product List

This is the first page of the website, so should be accessible by **<your_website>/**

![https://s3-us-west-2.amazonaws.com/secure.notion-static.com/e83ca9a2-5be8-4d2c-a777-462a7af67a45/Screenshot_2021-04-28_at_11.57.38.png](https://www.notion.so/image/https%3A%2F%2Fs3-us-west-2.amazonaws.com%2Fsecure.notion-static.com%2Fe83ca9a2-5be8-4d2c-a777-462a7af67a45%2FScreenshot_2021-04-28_at_11.57.38.png?table=block&id=4baf2e7e-7d44-47ba-9dfa-300be16c18cc&spaceId=196736dd-250f-45b1-ac1f-c4302855a2f9&width=2000&userId=&cache=v2)

[Open full size image](https://docs.google.com/document/d/1PzYObzyNIMBnzvkg22qTTmEk7H4jSsO4P6Bj9IABa2Y/edit)

Please note, that on product list page product should not be split by product types - they should be sorted by primary key in database.

### MUST HAVE for the list items

- SKU (unique for each product)
- Name
- Price in $
- One of the product-specific attributes and its value
  - Size (in MB) for DVD-disc
  - Weight (in Kg) for Book
  - Dimensions (HxWxL) for Furniture

### Required UI elements

- ~~“ADD” button, which would lead to the “Product Add” page~~ *DONE*
- “MASS DELETE” action, implemented as checkboxes next to each product (should have a class: .delete-checkbox) and a button “MASS DELETE” triggering delete action for the selected products.
- ~~There should be no pagination for the listing, all items should be on the same page~~ *DONE*
- ~~Do not show any notification messages or alert windows loading the list or after submitting ADD new product dialogue~~ *DONE*

[UI Details - (Classes, IDs)](https://www.notion.so/d775ef461f6b4cb99dbd60e2a01cba92)

---

## 2. Adding a product page

This page should open once button "ADD" is pressed, and should be accessible by: **<your_website>/add-product**

![https://s3-us-west-2.amazonaws.com/secure.notion-static.com/ad38993a-6d19-4b8d-af9c-bcab87249dca/Screenshot_2021-04-28_at_12.53.19.png](https://www.notion.so/image/https%3A%2F%2Fs3-us-west-2.amazonaws.com%2Fsecure.notion-static.com%2Fad38993a-6d19-4b8d-af9c-bcab87249dca%2FScreenshot_2021-04-28_at_12.53.19.png?table=block&id=c7a4b4bc-8cb2-4d1d-852c-0cc9ba6a714a&spaceId=196736dd-250f-45b1-ac1f-c4302855a2f9&width=2000&userId=&cache=v2)

[Open full size image](https://docs.google.com/document/d/1wu2J2Jp4KAYEVyQ6B7KSGFp_7oeDttH7DwOPLMARfws/edit)

### The page should display a form with id: #product_form, with the following fields

- SKU (id: #sku)
- Name (id: #name)
- Price (id: #price)

- Product type switcher (id: #productType) with following options:
  - DVD (can be value or text)
  - Book (can be value or text)
  - Furniture (can be value or text)

- Product type-specific attribute
  - Size input field (in MB) for DVD-disc should have an ID: #size
  - Weight input field (in Kg) for Book should have an ID: #weight
  - Each from Dimensions input fields (HxWxL) for Furniture should have an appropriate ID:
    - Height - #height
    - Width - #width
    - Length - #length

[UI Details - (Classes, IDs)](https://www.notion.so/b79ea3aa68c3453db4362254ec58e1a0)

### **Add product page requirements:**

- The form should be dynamically changed when the type is switched
- Special attributes should have a description, related to their type, e.g.: “Please, provide dimensions” / “Please, provide weight” / “Please, provide size” when related product type is selected
- All fields are mandatory for submission, missing values should trigger notification “Please, submit required data"
- Implement input field value validation, invalid data must trigger notification “Please, provide the data of indicated type”
- Notification messages should appear on the same page without reloading
- The page must have a “Save” button to save the product. Once saved, return to the “Product List” page with the new product added.
- The page must have a “Cancel” button to cancel adding the product action. Once canceled, returned to the “Product List” page with no new  products added.
- No additional dialogues like “Are you sure you want to Save / Cancel?”
