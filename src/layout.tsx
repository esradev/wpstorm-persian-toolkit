import { SidebarProvider } from "@/components/ui/sidebar"
import { Toaster } from "@/components/ui/toaster"
import { AppSidebar } from "@/components/app-sidebar"
import AppHeader from "@/components/app-header"
import { items } from "@/lib/utils"

export default function Layout({ children }: { children: React.ReactNode }) {
  return (
    <SidebarProvider>
      <AppSidebar side="right" items={items} />
      <main className="w-full">
        <AppHeader />
        {children}
        <Toaster />
      </main>
    </SidebarProvider>
  )
}
