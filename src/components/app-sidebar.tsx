import { NavLink } from "react-router-dom"

import { Sidebar, SidebarContent, SidebarGroup, SidebarGroupContent, SidebarGroupLabel, SidebarMenu, SidebarMenuButton, SidebarMenuItem } from "@/components/ui/sidebar"

import { useIsMobile } from "@/hooks/use-mobile"
import { useSidebar } from "@/components/ui/sidebar"

export function AppSidebar({ side, items }) {
  const isMobile = useIsMobile()
  const { toggleSidebar } = useSidebar()

  return (
    <Sidebar side={side}>
      <SidebarContent>
        <SidebarGroup>
          <SidebarGroupLabel>Wpstorm Theme Settings</SidebarGroupLabel>
          <SidebarGroupContent>
            <SidebarMenu>
              {items.map(item => (
                <SidebarMenuItem key={item.title}>
                  <SidebarMenuButton asChild className="outline-none shadow-none hover:bg-transparent active:bg-transparent focus:bg-transparent">
                    <NavLink onClick={isMobile ? toggleSidebar : undefined} to={item?.url}>
                      {({ isActive }) => (
                        <li className={`flex items-center gap-2 w-full px-3 py-2 text-sm font-medium text-gray-900 rounded-md ${isActive ? "bg-zinc-200" : ""}`}>
                          {" "}
                          <item.icon className="w-4 h-4" />
                          {item?.title}
                        </li>
                      )}
                    </NavLink>
                  </SidebarMenuButton>
                </SidebarMenuItem>
              ))}
            </SidebarMenu>
          </SidebarGroupContent>
        </SidebarGroup>
      </SidebarContent>
    </Sidebar>
  )
}
