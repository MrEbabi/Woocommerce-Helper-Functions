Pass a parameter from URL to Woocommerce checkout page and get this value in the order details

---

Problem:

"I am looking to use WooCommerce in a bit of a strange way, and I'm wondering if there is any way to make this possible. Here's my desired workflow:

Step #1: From a different site subdomain, provide a link to a certain virtual product, but with a query parameter with a unique user id number.

Explanation: The user is at othersite.example.com, and they get a link to buy a product in a WooCommerce store set up with a wordpress site at https://example.com/product/virtual-product

However, this product will be a payment to unlock something on the othersite.example.com site which has its own user and authentication system. (Firebase)

Would it be possible to pass a user id from the othersite.example.com by way of a url query parameter and then have that included in the order info?

ie. From the othersite.example.com someone could be given a link to the product like this https://example.com/product/virtual-product?userid=00000000000000000, with 00000000000000000 being their user id at othersite.example.com.

Then if that userid query value could be included in the order, the following steps should be doable.

Step #2: Have a webhook that fires when the product is purchased, telling a server managing the users for othersite.example.com that the user with userid 00000000000000000 has made a successful purchase of that product.

Is there a way to accept custom values like this to the order? Or is this totally out of the scope of WooCommerce's functionality?

Thanks so much."

---

Link: https://stackoverflow.com/questions/57217135/is-it-possible-to-pass-a-special-query-parameter-value-to-a-woocommerce-product/
