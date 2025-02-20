import { __ } from "@wordpress/i18n";
import { clsx, type ClassValue } from "clsx";
import { twMerge } from "tailwind-merge";

import { Home, LogIn } from "lucide-react";
import Settings from "@/pages/settings";
import Login from "@/pages/login";

export function cn(...inputs: ClassValue[]) {
  return twMerge(clsx(inputs));
}

export const items = [
  {
    title: __("General", "payamito-plus"),
    url: "/",
    icon: Home,
    component: Settings
  },
  {
    title: __("Login", "payamito-plus"),
    url: "/login",
    icon: LogIn,
    component: Login
  }
];
