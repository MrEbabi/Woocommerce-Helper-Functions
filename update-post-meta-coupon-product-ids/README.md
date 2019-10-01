### Programmatically creating/updating product ids that the coupons can be used with - using update_post_meta(x, 'product_ids', x)

---

### Problem: 

"I'm trying to programmatically create a Woocommerce coupon when a form is submitted on a single page template using the ACF fields from my page template ID for the coupon properties.

Looking at the Woocommerce documentation on how to do this, they suggest setting the properties using the update_post_meta() after inserting a new coupon.

However, when doing this the product ids aren't being aded when printing out the WC_Coupon object for the generated coupon and returns an empty array."

---

### Link: 
https://stackoverflow.com/questions/57588423/woocommerce-coupons-cant-update-product-ids-using-update-post-meta-programmat
