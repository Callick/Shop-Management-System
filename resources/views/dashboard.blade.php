<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-welcome />
            </div>
        </div>
    </div>
</x-app-layout>
<!--
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Management System</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
        .tab-button {
            transition: all 0.3s ease;
        }
        .tab-button.active {
            box-shadow: 0 2px 0 0 #4f46e5;
        }
        .form-section {
            display: none;
            animation: fadeIn 0.5s ease;
        }
        .form-section.active {
            display: block;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body class="bg-gray-100">
    <div class="min-h-screen bg-gray-100">-->
        <!-- Page Heading -->
        <!--<header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Dashboard
                </h2>
            </div>
        </header>

        <!-- Main Content -->
        <!--<main>
            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                        <h3 class="text-lg font-medium text-gray-900 mb-6">Management Panel</h3>
                        
                        <!-- Tab Navigation -->
                        <!--<div class="border-b border-gray-200 mb-6">
                            <nav class="flex space-x-8">
                                <button id="users-tab" class="tab-button active py-4 px-1 text-sm font-medium text-indigo-600">
                                    Add Users
                                </button>
                                <button id="shops-tab" class="tab-button py-4 px-1 text-sm font-medium text-gray-500 hover:text-gray-700">
                                    Add Shops
                                </button>
                                <button id="customers-tab" class="tab-button py-4 px-1 text-sm font-medium text-gray-500 hover:text-gray-700">
                                    Add Customers
                                </button>
                            </nav>
                        </div>
                        
                        <!-- Forms Container -->
                        <!--<div class="mt-6">
                            <!-- Add User Form -->
                            <!--<div id="users-form" class="form-section active">
                                <form class="space-y-6">
                                    <div>
                                        <label for="user-name" class="block text-sm font-medium text-gray-700">User Name <span class="text-red-500">*</span></label>
                                        <input type="text" id="user-name" name="user-name" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    </div>
                                    
                                    <div>
                                        <label for="user-email" class="block text-sm font-medium text-gray-700">User Email <span class="text-red-500">*</span></label>
                                        <input type="email" id="user-email" name="user-email" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    </div>
                                    
                                    <div>
                                        <label for="user-password" class="block text-sm font-medium text-gray-700">User Password <span class="text-red-500">*</span></label>
                                        <input type="password" id="user-password" name="user-password" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    </div>
                                    
                                    <div>
                                        <label for="user-role" class="block text-sm font-medium text-gray-700">User Role <span class="text-red-500">*</span></label>
                                        <select id="user-role" name="user-role" required class="mt-1 block w-full bg-white border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                            <option value="">Select a role</option>
                                            <option value="admin">Admin</option>
                                            <option value="assistant">Assistant</option>
                                        </select>
                                    </div>
                                    
                                    <div>
                                        <label for="shop-id" class="block text-sm font-medium text-gray-700">Shop ID</label>
                                        <input type="text" id="shop-id" name="shop-id" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    </div>
                                    
                                    <div>
                                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:border-indigo-900 focus:ring ring-indigo-300 disabled:opacity-25 transition ease-in-out duration-150">
                                            Add User
                                        </button>
                                    </div>
                                </form>
                            </div>
                            
                            <!-- Add Shop Form -->
                            <!--<div id="shops-form" class="form-section">
                                <form class="space-y-6">
                                    <div>
                                        <label for="shop-name" class="block text-sm font-medium text-gray-700">Shop Name <span class="text-red-500">*</span></label>
                                        <input type="text" id="shop-name" name="shop-name" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    </div>
                                    
                                    <div>
                                        <label for="proprietor-name" class="block text-sm font-medium text-gray-700">Shop Proprietor Name <span class="text-red-500">*</span></label>
                                        <input type="text" id="proprietor-name" name="proprietor-name" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    </div>
                                    
                                    <div>
                                        <label for="shop-email" class="block text-sm font-medium text-gray-700">Shop Email <span class="text-red-500">*</span></label>
                                        <input type="email" id="shop-email" name="shop-email" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    </div>
                                    
                                    <div>
                                        <label for="shop-address" class="block text-sm font-medium text-gray-700">Shop Address <span class="text-red-500">*</span></label>
                                        <textarea id="shop-address" name="shop-address" required rows="3" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"></textarea>
                                    </div>
                                    
                                    <div>
                                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:border-indigo-900 focus:ring ring-indigo-300 disabled:opacity-25 transition ease-in-out duration-150">
                                            Add Shop
                                        </button>
                                    </div>
                                </form>
                            </div>
                            
                            <!-- Add Customer Form -->
                            <!--<div id="customers-form" class="form-section">
                                <form class="space-y-6">
                                    <div>
                                        <label for="customer-name" class="block text-sm font-medium text-gray-700">Customer Name <span class="text-red-500">*</span></label>
                                        <input type="text" id="customer-name" name="customer-name" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    </div>
                                    
                                    <div>
                                        <label for="product-name" class="block text-sm font-medium text-gray-700">Customer Product Name <span class="text-red-500">*</span></label>
                                        <input type="text" id="product-name" name="product-name" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    </div>
                                    
                                    <div>
                                        <label for="product-issue" class="block text-sm font-medium text-gray-700">Product Issue <span class="text-red-500">*</span></label>
                                        <textarea id="product-issue" name="product-issue" required rows="4" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"></textarea>
                                    </div>
                                    
                                    <div>
                                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:border-indigo-900 focus:ring ring-indigo-300 disabled:opacity-25 transition ease-in-out duration-150">
                                            Add Customer
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script>
        // Tab switching functionality
        document.addEventListener('DOMContentLoaded', function() {
            const tabs = {
                'users-tab': 'users-form',
                'shops-tab': 'shops-form',
                'customers-tab': 'customers-form'
            };
            
            // Add click event listeners to all tabs
            Object.keys(tabs).forEach(tabId => {
                document.getElementById(tabId).addEventListener('click', () => {
                    switchTab(tabId);
                });
            });
            
            function switchTab(activeTabId) {
                // Update tab buttons
                Object.keys(tabs).forEach(tabId => {
                    const tabElement = document.getElementById(tabId);
                    if (tabId === activeTabId) {
                        tabElement.classList.add('active', 'text-indigo-600');
                        tabElement.classList.remove('text-gray-500', 'hover:text-gray-700');
                    } else {
                        tabElement.classList.remove('active', 'text-indigo-600');
                        tabElement.classList.add('text-gray-500', 'hover:text-gray-700');
                    }
                });
                
                // Update form sections
                Object.values(tabs).forEach(formId => {
                    const formElement = document.getElementById(formId);
                    if (formId === tabs[activeTabId]) {
                        formElement.classList.add('active');
                    } else {
                        formElement.classList.remove('active');
                    }
                });
            }
        });
    </script>
</body>
</html>