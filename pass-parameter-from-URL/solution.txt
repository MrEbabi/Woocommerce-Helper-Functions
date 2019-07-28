- I believe that it can be done by using a redirection/link directly to the checkout page, like: "http://yourdomain.com/checkout/?add-to-cart=PRODUCTID&000000" (tested)

- In the example, "checkout" stands for the name of your checkout page, "PRODUCTID" stands for the id of desired product, "000000" stands for the user id of redirected person in the other website.

- Then you can add a hidden input field to the checkout page (into checkout form, so you will see this value in order) and using the URL you can assign the "000000" (user id) to the value of this field.

---

- Useful link for hidden input field addition: https://stackoverflow.com/a/42614905/11003615

- Useful link for getting value from current URL using JS: https://web-design-weekly.com/snippets/get-url-with-javascript/

- Useful link for getting value from current URL using PHP/Wordpress Core: https://wordpress.stackexchange.com/questions/274569/how-to-get-url-of-current-page-displayed

- Useful link (contains 4 parts) for adding a custom field to checkout & validating this field & saving this field to order fields & displaying the value of this field in order page: https://docs.woocommerce.com/document/tutorial-customising-checkout-fields-using-actions-and-filters/#section-7
