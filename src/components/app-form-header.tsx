import { cn } from "@/lib/utils";
import { Separator } from "@/components/ui/separator";
import { AppFormHeaderProps } from "@/types/form";

export default function AppFormHeader({ title, description, className }: AppFormHeaderProps) {
  return (
    <div className={cn("space-y-4 mb-6", className)}>
      <div className="space-y-2">
        <h2 className="text-2xl font-bold tracking-tight">{title}</h2>
        {description && <p className="text-muted-foreground">{description}</p>}
      </div>
      <Separator />
    </div>
  );
}
