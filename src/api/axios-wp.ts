import Axios from "axios"

/**
 *
 * Create an Api object with Axios and
 * configure it for the WordPress Rest Api.
 *
 * The 'wpstormptLocalize' object is injected into the page
 * using the WordPress wp_localize_script function.
 *
 * @see https://since1979.dev/snippet-014-setup-axios-for-the-wordpress-rest-api/
 * @since 1.0.0
 */
const AxiosWp = Axios.create({
  baseURL: wpstormptLocalize.rootapiurl + "payamito/v1/",
  headers: {
    "content-type": "application/json",
    "X-WP-Nonce": wpstormptLocalize.nonce
  }
})

export default AxiosWp
