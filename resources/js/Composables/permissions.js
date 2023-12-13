import { usePage } from "@inertiajs/vue3";

export function usePermission() {
    const role = usePage().props.auth.user.roles || [];
    const permission = usePage().props.auth.user.permissions || [];
    const hasRole = (name) => role.includes(name);
    const hasPermission = (name) => permission.includes(name);

    return { hasRole, hasPermission };
}