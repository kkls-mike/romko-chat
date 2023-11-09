import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Head, Link } from '@inertiajs/react';
import { PageProps } from '@/types';

export default function Dashboard({ auth }: PageProps) {
    return (
        <AuthenticatedLayout
            user={auth.user}
            header={<h2 className="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Заканало!!!</h2>}
        >
            <Head title="Dashboard" />

            <div className="hero min-h-screen bg-base-200">
                <div className="hero-content text-center">
                    <div className="max-w-md">
                        <h1 className="text-5xl font-bold">Ромко здоров!</h1>
                        <p className="py-6">Тикай кнопочку внизу</p>
                        <Link className={'btn btn-primary'} href="/chat">Го Чат</Link>
                    </div>
                </div>
            </div>
        </AuthenticatedLayout>
    );
}
