"use client";

import { zodResolver } from "@hookform/resolvers/zod";
import { useForm } from "react-hook-form";

import { Button } from "@/components/ui/button";
import { Form, FormControl, FormDescription, FormField, FormItem, FormLabel, FormMessage } from "@/components/ui/form";
import { Input } from "@/components/ui/input";
import { Textarea } from "@/components/ui/textarea";
import { Switch } from "@/components/ui/switch";
import { Select, SelectContent, SelectItem, SelectTrigger, SelectValue } from "@/components/ui/select";

import { useToast } from "@/hooks/use-toast";

import { AppFormProps, FormInput } from "@/types/form";
import AppFormHeader from "./app-form-header";

export function AppForm({ schema, defaultValues, inputs, headerInfo }: AppFormProps) {
  const { toast } = useToast();

  function onSubmit(values: any) {
    toast({
      title: "You submitted the following values:",
      description: (
        <pre className="mt-2 w-[340px] rounded-md bg-slate-950 p-4">
          <code className="text-white">{JSON.stringify(values, null, 2)}</code>
        </pre>
      )
    });
  }

  const form = useForm({
    resolver: zodResolver(schema),
    defaultValues
  });

  const renderField = (input: FormInput, field: any) => {
    switch (input.type) {
      case "textarea":
        return (
          <FormItem>
            <FormLabel>{input.label}</FormLabel>
            <FormControl>
              <Textarea placeholder={input.placeholder} {...field} />
            </FormControl>
            {input.description && <FormDescription>{input.description}</FormDescription>}
            <FormMessage />
          </FormItem>
        );
      case "switch":
        return (
          <FormItem className="flex flex-row items-center justify-between rounded-lg border p-3 shadow-sm">
            <div className="space-y-0.5">
              <FormLabel>{input.label}</FormLabel>
              <FormDescription>{input.description}</FormDescription>
            </div>
            <FormControl>
              <Switch checked={field.value} onCheckedChange={field.onChange} {...field} />
            </FormControl>
            <FormMessage />
          </FormItem>
        );
      case "select":
        return (
          <FormItem className="flex flex-row items-center justify-between rounded-lg border p-3 shadow-sm">
            <div className="space-y-0.5">
              <FormLabel>{input.label}</FormLabel>
              {input.description && <FormDescription>{input.description}</FormDescription>}
            </div>
            <Select onValueChange={field.onChange} defaultValue={field.value}>
              <FormControl>
                <SelectTrigger className="w-[300px]">
                  <SelectValue placeholder="Chose default theme" />
                </SelectTrigger>
              </FormControl>
              <SelectContent>
                {input?.options?.map(option => (
                  <SelectItem key={option.value} value={option.value}>
                    {option.label}
                  </SelectItem>
                ))}
              </SelectContent>
            </Select>
            <FormMessage />
          </FormItem>
        );
      default:
        return (
          <FormItem>
            <FormLabel>{input.label}</FormLabel>
            <FormControl>
              <Input placeholder={input.placeholder} type={input.type} {...field} />
            </FormControl>
            {input.description && <FormDescription>{input.description}</FormDescription>}
            <FormMessage />
          </FormItem>
        );
    }
  };

  return (
    <div className="p-2">
      <AppFormHeader title={headerInfo.title} description={headerInfo.description} />
      <Form {...form}>
        <form onSubmit={form.handleSubmit(onSubmit)} className="space-y-8">
          {inputs.map(input => (
            <FormField key={input.name} control={form.control} name={input.name} render={({ field }) => renderField(input, field)} />
          ))}
          <Button type="submit">Submit</Button>
        </form>
      </Form>
    </div>
  );
}
