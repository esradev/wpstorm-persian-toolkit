import { useState, useEffect } from "@wordpress/element"
import { AppForm } from "@/components/app-form"
import { z } from "zod"

import { AppFormProps, FormInput } from "@/types/form"
import { getOptions } from "@/api/api-functions"

const Settings = () => {
  const formSchema = z.object({
    wordpress_core: z.boolean(),
    woocommerce: z.boolean()
  })

  const defaultValues = {
    wordpress_core: false,
    woocommerce: false
  }

  const inputs: FormInput[] = [
    { name: "wordpress_core", label: "WordPress Core", description: "Enable Jalali date and datepicker on WordPress core", type: "switch" },
    { name: "woocommerce", label: "WooCommerce", description: "Enable Jalali date and datepicker on WooCommerce plugin", type: "switch" }
  ]

  const headerInfo: AppFormProps["headerInfo"] = {
    title: "Settings",
    description: "Update your account settings.",
    restRoute: "jalali_date_options"
  }

  return <AppForm schema={formSchema} defaultValues={defaultValues} inputs={inputs} headerInfo={headerInfo} />
}

export default Settings
