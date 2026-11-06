# Stock Management System - Documentation

## 1. Project Title

**Stock Management System**

## 2. System Overview

**System Name:** Stock Management System

**Case Study:** A retail business needs to manage their inventory across multiple warehouses. The system should track products, suppliers, stock levels, orders, and transactions to ensure efficient inventory management.

**System Overview:**
The Stock Management System is a web-based application designed to help businesses manage their inventory efficiently. It allows administrators to track products, manage suppliers, monitor stock levels across multiple warehouses, process orders, and generate reports. The system provides real-time visibility into inventory status, helping businesses make informed decisions about purchasing and stock allocation.

## 3. Problem Statement

Retail businesses that manage inventory manually or through separate records often experience several operational problems:

- Product information may be stored in multiple locations, making it difficult to maintain accurate and up-to-date records.
- Stock quantities across different warehouses may become outdated, resulting in overstocking or stock shortages.
- Supplier details and purchase orders may be difficult to track, especially when orders involve multiple products.
- Employees may have difficulty determining which products are below their reorder levels.
- Manual record keeping increases the risk of duplicate entries, inconsistent data, and human error.
- Managers may not have timely access to inventory and purchasing information needed for decision-making.

These problems can lead to inefficient warehouse operations, inaccurate inventory records, delayed purchasing decisions, and increased operational costs.

## 4. Proposed Solution

The proposed solution is a centralized web-based Stock Management System that stores product, supplier, warehouse, stock, and purchase order information in a relational database.

The system will provide the following capabilities:

- Centralized management of product and category information.
- Management of supplier records and supplier contact details.
- Support for multiple warehouses and warehouse managers.
- Tracking of stock quantities for each product in each warehouse.
- Monitoring of reorder levels to identify low-stock items.
- Creation and tracking of purchase orders and order items.
- Role-based user access for administrators, inventory managers, and warehouse staff.
- Data validation and database constraints to improve data integrity.

By replacing fragmented manual records with a centralized database and web interface, the system will improve inventory visibility, reduce data-entry errors, support more informed purchasing decisions, and make warehouse operations easier to manage.

## 5. Objectives

### 5.1 General Objective

To design and develop a web-based Stock Management System that enables a retail business to efficiently manage products, suppliers, warehouses, inventory levels, and purchase orders through a centralized relational database.

### 5.2 Specific Objectives

- To create a system for managing product categories and product information, including product names, SKUs, descriptions, and prices.
- To implement supplier management for storing supplier contact and business information.
- To support multiple warehouses and allow authorized users to manage warehouse details and assigned managers.
- To track stock quantities for each product within each warehouse.
- To monitor reorder levels and identify products with low inventory.
- To implement purchase order management, including order details, suppliers, warehouses, dates, status, and individual order items.
- To enforce data integrity through primary keys, foreign keys, unique constraints, validation rules, and referential integrity.
- To provide role-based access for administrators, inventory managers, and warehouse staff.
- To provide a responsive and user-friendly interface for performing inventory management tasks.

## 6. System Users (Stakeholders)

### Primary Users (Actors):

1. **Administrator**
   - Role: Full system access
   - Responsibilities:
     - Manage users and permissions
     - Configure system settings
     - View all reports and analytics
     - Manage suppliers and warehouses
     - Override stock levels

2. **Inventory Manager**
   - Role: Day-to-day inventory operations
   - Responsibilities:
     - Add/edit products
     - Manage stock levels
     - Process stock transfers between warehouses
     - Generate inventory reports
     - Manage product categories

3. **Warehouse Staff**
   - Role: Physical warehouse operations
   - Responsibilities:
     - Receive incoming stock
     - Process outgoing orders
     - Update stock quantities
     - View warehouse-specific inventory

4. **Supplier**
   - Role: External entity
   - Responsibilities:
     - View purchase orders
     - Update order status
     - View payment information
     - Manage product catalog

5. **Customer (Optional - for future expansion)**
   - Role: End consumer
   - Responsibilities:
     - Browse products
   - Place orders
   - View order status

## 7. Entity-Relationship Diagram (ERD) Design

### Part I: Entity Identification

#### Strong Entities:

1. **Product**
   - Stores product information
   - Primary entity for inventory tracking

2. **Supplier**
   - Stores supplier/vendor information
   - Independent entity

3. **Warehouse**
   - Stores warehouse/location information
   - Independent entity

4. **Category**
   - Stores product categories
   - Independent entity

5. **User**
   - Stores system user information
   - Independent entity

#### Associative (Composite) Entities:

1. **Stock**
   - Associates Product with Warehouse
   - Tracks quantity of each product in each warehouse
   - M:N relationship between Product and Warehouse

2. **PurchaseOrder**
   - Associates Supplier with Products
   - Tracks orders placed with suppliers
   - M:N relationship between Supplier and Product

3. **OrderItem**
   - Associates PurchaseOrder with Product
   - Tracks individual items in an order
   - M:N relationship between PurchaseOrder and Product

### Part II: Entity Attributes & Key Mapping

#### 1. Product
| Attribute | Data Type | Key | Description |
|-----------|-----------|-----|-------------|
| id | INT | PK | Unique identifier |
| name | VARCHAR(255) | - | Product name |
| sku | VARCHAR(50) | UNIQUE | Stock Keeping Unit |
| description | TEXT | - | Product description |
| price | DECIMAL(10,2) | - | Unit price |
| category_id | INT | FK | Reference to Category |
| created_at | TIMESTAMP | - | Creation timestamp |
| updated_at | TIMESTAMP | - | Update timestamp |

#### 2. Supplier
| Attribute | Data Type | Key | Description |
|-----------|-----------|-----|-------------|
| id | INT | PK | Unique identifier |
| name | VARCHAR(255) | - | Supplier name |
| contact_person | VARCHAR(255) | - | Contact person |
| email | VARCHAR(255) | - | Email address |
| phone | VARCHAR(20) | - | Phone number |
| address | TEXT | - | Physical address |
| created_at | TIMESTAMP | - | Creation timestamp |
| updated_at | TIMESTAMP | - | Update timestamp |

#### 3. Warehouse
| Attribute | Data Type | Key | Description |
|-----------|-----------|-----|-------------|
| id | INT | PK | Unique identifier |
| name | VARCHAR(255) | - | Warehouse name |
| location | VARCHAR(255) | - | Physical location |
| capacity | INT | - | Maximum storage capacity |
| manager_id | INT | FK | Reference to User |
| created_at | TIMESTAMP | - | Creation timestamp |
| updated_at | TIMESTAMP | - | Update timestamp |

#### 4. Category
| Attribute | Data Type | Key | Description |
|-----------|-----------|-----|-------------|
| id | INT | PK | Unique identifier |
| name | VARCHAR(255) | - | Category name |
| description | TEXT | - | Category description |
| created_at | TIMESTAMP | - | Creation timestamp |
| updated_at | TIMESTAMP | - | Update timestamp |

#### 5. User
| Attribute | Data Type | Key | Description |
|-----------|-----------|-----|-------------|
| id | INT | PK | Unique identifier |
| name | VARCHAR(255) | - | User name |
| email | VARCHAR(255) | UNIQUE | Email address |
| password | VARCHAR(255) | - | Encrypted password |
| role | ENUM | - | Role (admin, manager, staff) |
| created_at | TIMESTAMP | - | Creation timestamp |
| updated_at | TIMESTAMP | - | Update timestamp |

#### 6. Stock (Associative)
| Attribute | Data Type | Key | Description |
|-----------|-----------|-----|-------------|
| id | INT | PK | Unique identifier |
| product_id | INT | FK | Reference to Product |
| warehouse_id | INT | FK | Reference to Warehouse |
| quantity | INT | - | Current stock quantity |
| reorder_level | INT | - | Minimum stock before reorder |
| created_at | TIMESTAMP | - | Creation timestamp |
| updated_at | TIMESTAMP | - | Update timestamp |

#### 7. PurchaseOrder
| Attribute | Data Type | Key | Description |
|-----------|-----------|-----|-------------|
| id | INT | PK | Unique identifier |
| order_number | VARCHAR(50) | UNIQUE | Order reference |
| supplier_id | INT | FK | Reference to Supplier |
| warehouse_id | INT | FK | Reference to Warehouse |
| order_date | DATE | - | Date order placed |
| expected_date | DATE | - | Expected delivery date |
| status | ENUM | - | Status (pending, received, cancelled) |
| total_amount | DECIMAL(10,2) | - | Total order value |
| created_at | TIMESTAMP | - | Creation timestamp |
| updated_at | TIMESTAMP | - | Update timestamp |

#### 8. OrderItem
| Attribute | Data Type | Key | Description |
|-----------|-----------|-----|-------------|
| id | INT | PK | Unique identifier |
| purchase_order_id | INT | FK | Reference to PurchaseOrder |
| product_id | INT | FK | Reference to Product |
| quantity | INT | - | Quantity ordered |
| unit_price | DECIMAL(10,2) | - | Price per unit |
| subtotal | DECIMAL(10,2) | - | Line item total |
| created_at | TIMESTAMP | - | Creation timestamp |
| updated_at | TIMESTAMP | - | Update timestamp |

### Part III: Relationship & Cardinality Analysis

#### Binary Relationships:

1. **Supplier - PurchaseOrder**
   - Relationship: Supplier places PurchaseOrder
   - Cardinality: 1:N (One supplier can have many purchase orders)
   - Participation: Partial (Supplier can exist without orders)
   - Mapping: FK (supplier_id) in PurchaseOrder

2. **Warehouse - PurchaseOrder**
   - Relationship: Warehouse receives PurchaseOrder
   - Cardinality: 1:N (One warehouse can receive many orders)
   - Participation: Partial (Warehouse can exist without orders)
   - Mapping: FK (warehouse_id) in PurchaseOrder

3. **Category - Product**
   - Relationship: Category contains Product
   - Cardinality: 1:N (One category can have many products)
   - Participation: Partial (Category can exist without products)
   - Mapping: FK (category_id) in Product

4. **Product - Stock**
   - Relationship: Product has Stock
   - Cardinality: 1:N (One product can have stock in multiple warehouses)
   - Participation: Total (Product must have at least one stock record)
   - Mapping: FK (product_id) in Stock

5. **Warehouse - Stock**
   - Relationship: Warehouse stores Stock
   - Cardinality: 1:N (One warehouse can store many products)
   - Participation: Total (Warehouse must have stock records)
   - Mapping: FK (warehouse_id) in Stock

6. **Product - OrderItem**
   - Relationship: Product appears in OrderItem
   - Cardinality: 1:N (One product can appear in many order items)
   - Participation: Partial (Product can exist without being ordered)
   - Mapping: FK (product_id) in OrderItem

7. **PurchaseOrder - OrderItem**
   - Relationship: PurchaseOrder contains OrderItem
   - Cardinality: 1:N (One purchase order can have many items)
   - Participation: Total (Purchase order must have at least one item)
   - Mapping: FK (purchase_order_id) in OrderItem

8. **User - Warehouse**
   - Relationship: User manages Warehouse
   - Cardinality: 1:N (One user can manage multiple warehouses)
   - Participation: Partial (User can exist without managing warehouse)
   - Mapping: FK (manager_id) in Warehouse

#### M:N Relationships (resolved via associative entities):

1. **Product - Warehouse** (M:N)
   - Resolved through: Stock entity
   - One product can be stored in multiple warehouses
   - One warehouse can store multiple products

2. **Supplier - Product** (M:N)
   - Resolved through: PurchaseOrder and OrderItem entities
   - One supplier can supply multiple products
   - One product can be supplied by multiple suppliers

### Part IV: ERD Diagram

```
┌─────────────┐         ┌─────────────┐
│  Category   │         │   Supplier  │
├─────────────┤         ├─────────────┤
│ id (PK)     │         │ id (PK)     │
│ name        │         │ name        │
│ description │         │ contact_... │
└──────┬──────┘         └──────┬──────┘
       │ 1:N                   │ 1:N
       │                       │
       ▼                       ▼
┌─────────────┐         ┌─────────────┐
│   Product   │         │PurchaseOrder│
├─────────────┤         ├─────────────┤
│ id (PK)     │         │ id (PK)     │
│ name        │         │ order_#     │
│ sku         │         │ supplier_id │
│ description │         │ warehouse_id│
│ price       │         │ order_date  │
│ category_id │         │ status      │
└──────┬──────┘         └──────┬──────┘
       │ 1:N                   │ 1:N
       │                       │
       │                       ▼
       │               ┌─────────────┐
       │               │  OrderItem  │
       │               ├─────────────┤
       │               │ id (PK)     │
       │               │ po_id (FK)  │
       │               │ product_id  │
       │               │ quantity    │
       │               │ unit_price  │
       │               └─────────────┘
       │
       ▼
┌─────────────┐         ┌─────────────┐
│    Stock    │         │  Warehouse  │
├─────────────┤         ├─────────────┤
│ id (PK)     │         │ id (PK)     │
│ product_id  │◄────────│ name        │
│ warehouse_id│  1:N    │ location    │
│ quantity    │         │ capacity    │
│ reorder_lvl │         │ manager_id  │
└─────────────┘         └──────┬──────┘
                                │ 1:N
                                ▼
                         ┌─────────────┐
                         │    User     │
                         ├─────────────┤
                         │ id (PK)     │
                         │ name        │
                         │ email       │
                         │ password    │
                         │ role        │
                         └─────────────┘
```

## 8. Database Schema (SQL Implementation)

The database schema was designed from the ERD and implemented using Laravel migrations. The tables, attributes, primary keys, foreign keys, unique constraints, and referential integrity rules are described in the ERD-to-database implementation section below.

## 9. ERD-to-Database Implementation

### 9.1 ERD-to-Table Mapping

Each entity identified in the ERD is implemented as a table in the MySQL database:

| ERD Entity | Database Table | Primary Key | Purpose |
|---|---|---|---|
| User | users | id | Stores system users and roles |
| Category | categories | id | Stores product categories |
| Supplier | suppliers | id | Stores supplier information |
| Warehouse | warehouses | id | Stores warehouse locations and managers |
| Product | products | id | Stores product catalog information |
| Stock | stocks | id | Tracks product quantities by warehouse |
| PurchaseOrder | purchase_orders | id | Stores purchase order information |
| OrderItem | order_items | id | Stores products and quantities in purchase orders |

### 9.2 Database Tables and Attributes

#### users

| Column | Data Type | Constraints | Description |
|---|---|---|---|
| id | BIGINT UNSIGNED | Primary key, auto-increment | Unique user identifier |
| name | VARCHAR | Required | User name |
| email | VARCHAR | Required, unique | User email address |
| email_verified_at | TIMESTAMP | Nullable | Email verification timestamp |
| password | VARCHAR | Required | Hashed user password |
| role | ENUM | Required, default `staff` | User role |
| remember_token | VARCHAR | Nullable | Password reset token |
| created_at | TIMESTAMP | Nullable | Record creation timestamp |
| updated_at | TIMESTAMP | Nullable | Record update timestamp |

#### categories

| Column | Data Type | Constraints | Description |
|---|---|---|---|
| id | BIGINT UNSIGNED | Primary key, auto-increment | Unique category identifier |
| name | VARCHAR | Required | Category name |
| description | TEXT | Nullable | Category description |
| created_at | TIMESTAMP | Nullable | Record creation timestamp |
| updated_at | TIMESTAMP | Nullable | Record update timestamp |

#### suppliers

| Column | Data Type | Constraints | Description |
|---|---|---|---|
| id | BIGINT UNSIGNED | Primary key, auto-increment | Unique supplier identifier |
| name | VARCHAR | Required | Supplier name |
| contact_person | VARCHAR | Nullable | Contact person name |
| email | VARCHAR | Nullable | Supplier email address |
| phone | VARCHAR(20) | Nullable | Supplier phone number |
| address | TEXT | Nullable | Supplier address |
| created_at | TIMESTAMP | Nullable | Record creation timestamp |
| updated_at | TIMESTAMP | Nullable | Record update timestamp |

#### warehouses

| Column | Data Type | Constraints | Description |
|---|---|---|---|
| id | BIGINT UNSIGNED | Primary key, auto-increment | Unique warehouse identifier |
| name | VARCHAR | Required | Warehouse name |
| location | VARCHAR | Required | Warehouse location |
| capacity | INTEGER | Required, default `0` | Maximum storage capacity |
| manager_id | BIGINT UNSIGNED | Foreign key to `users.id`, nullable, `SET NULL` on delete | Assigned warehouse manager |
| created_at | TIMESTAMP | Nullable | Record creation timestamp |
| updated_at | TIMESTAMP | Nullable | Record update timestamp |

#### products

| Column | Data Type | Constraints | Description |
|---|---|---|---|
| id | BIGINT UNSIGNED | Primary key, auto-increment | Unique product identifier |
| name | VARCHAR | Required | Product name |
| sku | VARCHAR(50) | Required, unique | Stock Keeping Unit |
| description | TEXT | Nullable | Product description |
| price | DECIMAL(10,2) | Required | Product unit price |
| category_id | BIGINT UNSIGNED | Foreign key to `categories.id`, nullable, `SET NULL` on delete | Product category |
| created_at | TIMESTAMP | Nullable | Record creation timestamp |
| updated_at | TIMESTAMP | Nullable | Record update timestamp |

#### stocks

| Column | Data Type | Constraints | Description |
|---|---|---|---|
| id | BIGINT UNSIGNED | Primary key, auto-increment | Unique stock record identifier |
| product_id | BIGINT UNSIGNED | Foreign key to `products.id`, required, `CASCADE` on delete | Product in stock |
| warehouse_id | BIGINT UNSIGNED | Foreign key to `warehouses.id`, required, `CASCADE` on delete | Warehouse containing stock |
| quantity | INTEGER | Required, default `0` | Current stock quantity |
| reorder_level | INTEGER | Required, default `10` | Minimum quantity before reorder |
| created_at | TIMESTAMP | Nullable | Record creation timestamp |
| updated_at | TIMESTAMP | Nullable | Record update timestamp |
| product_id + warehouse_id | Composite | Unique constraint | Prevents duplicate stock records for the same product and warehouse |

#### purchase_orders

| Column | Data Type | Constraints | Description |
|---|---|---|---|
| id | BIGINT UNSIGNED | Primary key, auto-increment | Unique purchase order identifier |
| order_number | VARCHAR(50) | Required, unique | Purchase order reference number |
| supplier_id | BIGINT UNSIGNED | Foreign key to `suppliers.id`, required, `RESTRICT` on delete | Supplier receiving the order |
| warehouse_id | BIGINT UNSIGNED | Foreign key to `warehouses.id`, required, `RESTRICT` on delete | Warehouse receiving the order |
| order_date | DATE | Required | Date the order was placed |
| expected_date | DATE | Nullable | Expected delivery date |
| status | ENUM | Required, default `pending` | Order status: `pending`, `received`, or `cancelled` |
| total_amount | DECIMAL(10,2) | Required, default `0` | Total purchase order amount |
| created_at | TIMESTAMP | Nullable | Record creation timestamp |
| updated_at | TIMESTAMP | Nullable | Record update timestamp |

#### order_items

| Column | Data Type | Constraints | Description |
|---|---|---|---|
| id | BIGINT UNSIGNED | Primary key, auto-increment | Unique order item identifier |
| purchase_order_id | BIGINT UNSIGNED | Foreign key to `purchase_orders.id`, required, `CASCADE` on delete | Related purchase order |
| product_id | BIGINT UNSIGNED | Foreign key to `products.id`, required, `RESTRICT` on delete | Ordered product |
| quantity | INTEGER | Required | Quantity ordered |
| unit_price | DECIMAL(10,2) | Required | Price per unit |
| subtotal | DECIMAL(10,2) | Required | Total price for the order item |
| created_at | TIMESTAMP | Nullable | Record creation timestamp |
| updated_at | TIMESTAMP | Nullable | Record update timestamp |

### 9.3 Relationship Implementation

| ERD Relationship | Database Implementation |
|---|---|
| Category to Product | `products.category_id` references `categories.id` |
| User to Warehouse | `warehouses.manager_id` references `users.id` |
| Supplier to PurchaseOrder | `purchase_orders.supplier_id` references `suppliers.id` |
| Warehouse to PurchaseOrder | `purchase_orders.warehouse_id` references `warehouses.id` |
| Product to Stock | `stocks.product_id` references `products.id` |
| Warehouse to Stock | `stocks.warehouse_id` references `warehouses.id` |
| PurchaseOrder to OrderItem | `order_items.purchase_order_id` references `purchase_orders.id` |
| Product to OrderItem | `order_items.product_id` references `products.id` |

### 9.4 Many-to-Many Relationship Resolution

The many-to-many relationship between products and warehouses is represented by the `stocks` table. Each record links one product to one warehouse and stores the quantity and reorder level for that combination. The unique constraint on `(product_id, warehouse_id)` prevents duplicate records.

The relationship between suppliers, products, and purchase orders is represented through the `purchase_orders` and `order_items` tables. A purchase order links a supplier and warehouse, while each order item links a product to that purchase order with its quantity, unit price, and subtotal.

### 9.5 Referential Integrity

The database uses foreign key constraints to maintain relationships between tables:

- Deleting a category sets the related product's `category_id` to `NULL`.
- Deleting a user sets the related warehouse's `manager_id` to `NULL`.
- Deleting a product deletes related stock records and restricts deletion when referenced by order items.
- Deleting a warehouse deletes related stock records and restricts deletion when referenced by purchase orders.
- Deleting a supplier restricts deletion when referenced by purchase orders.
- Deleting a purchase order deletes its related order items.
- Deleting a product restricts deletion when referenced by order items.

These constraints help maintain data consistency and prevent orphaned or invalid records.

## 10. System Implementation

### 10.1 Technology Stack
- **Framework:** Laravel 10.x
- **Database:** MySQL
- **PHP Version:** 8.1+
- **Frontend:** Blade Templates

### 10.2 Project Structure
```
Laravel_project/
├── app/
│   ├── Http/
│   │   └── Controllers/
│   │       ├── CategoryController.php
│   │       ├── SupplierController.php
│   │       ├── WarehouseController.php
│   │       ├── ProductController.php
│   │       ├── StockController.php
│   │       ├── PurchaseOrderController.php
│   │       └── DashboardController.php
│   └── Models/
│       ├── Category.php
│       ├── Supplier.php
│       ├── Warehouse.php
│       ├── Product.php
│       ├── Stock.php
│       ├── PurchaseOrder.php
│       ├── OrderItem.php
│       └── User.php
├── database/
│   ├── migrations/
│   │   ├── 2014_10_12_000000_create_users_table.php
│   │   ├── 2014_10_12_000001_add_role_to_users_table.php
│   │   ├── 2026_11_04_125932_create_categories_table.php
│   │   ├── 2026_11_04_125958_create_warehouses_table.php
│   │   ├── 2026_11_04_125959_create_suppliers_table.php
│   │   ├── 2026_11_04_130000_create_products_table.php
│   │   ├── 2026_11_04_130017_create_purchase_orders_table.php
│   │   ├── 2026_11_04_130018_create_stocks_table.php
│   │   └── 2026_11_04_130019_create_order_items_table.php
│   └── seeders/
│       ├── DatabaseSeeder.php
│       ├── UserSeeder.php
│       ├── CategorySeeder.php
│       ├── SupplierSeeder.php
│       ├── WarehouseSeeder.php
│       ├── ProductSeeder.php
│       ├── StockSeeder.php
│       ├── PurchaseOrderSeeder.php
│       └── OrderItemSeeder.php
├── resources/
│   └── views/
│       ├── dashboard.blade.php
│       ├── categories/
│       ├── suppliers/
│       ├── warehouses/
│       ├── products/
│       ├── stocks/
│       └── purchase_orders/
└── routes/
    └── web.php
```

### 10.3 Database Migrations

All migrations include proper foreign key constraints and unique constraints:

**Tables Created:**
1. **users** - System users with roles (admin, manager, staff)
2. **categories** - Product categories
3. **warehouses** - Storage locations with managers
4. **suppliers** - Vendor information
5. **products** - Product catalog with SKU and pricing
6. **purchase_orders** - Orders placed with suppliers
7. **stocks** - Product quantities per warehouse (associative entity)
8. **order_items** - Individual items in purchase orders (associative entity)

### 10.4 Model Relationships

**Category Model:**
- hasMany: Products

**Supplier Model:**
- hasMany: PurchaseOrders

**Warehouse Model:**
- belongsTo: User (manager)
- hasMany: Stocks
- hasMany: PurchaseOrders

**Product Model:**
- belongsTo: Category
- hasMany: Stocks
- hasMany: OrderItems

**Stock Model:**
- belongsTo: Product
- belongsTo: Warehouse

**PurchaseOrder Model:**
- belongsTo: Supplier
- belongsTo: Warehouse
- hasMany: OrderItems

**OrderItem Model:**
- belongsTo: PurchaseOrder
- belongsTo: Product

**User Model:**
- hasMany: Warehouses (as manager)

### 10.5 Routes

All CRUD operations are available for each entity:

- `/` - Dashboard
- `/categories` - Category CRUD
- `/suppliers` - Supplier CRUD
- `/warehouses` - Warehouse CRUD
- `/products` - Product CRUD
- `/stocks` - Stock CRUD
- `/purchase_orders` - Purchase Order CRUD

### 10.6 Database Seeding

The system includes sample data for testing:
- 3 Users (admin, manager, staff)
- 4 Categories
- 3 Suppliers
- 2 Warehouses
- 5 Products
- 5 Stock records
- 2 Purchase Orders
- 4 Order Items

## 11. How to Run the System

### 11.1 Prerequisites
- PHP 8.1 or higher
- Composer
- MySQL
- Web server (Apache/Nginx) or PHP built-in server

### 11.2 Installation Steps

1. **Navigate to project directory:**
   ```bash
   cd C:\xampp\htdocs\Laravel_project
   ```

2. **Install dependencies (if not already installed):**
   ```bash
   composer install
   ```

3. **Configure environment:**
   - Copy `.env.example` to `.env` (if not exists)
   - Update database credentials in `.env` file

4. **Generate application key:**
   ```bash
   php artisan key:generate
   ```

5. **Run migrations:**
   ```bash
   php artisan migrate
   ```

6. **Seed the database:**
   ```bash
   php artisan db:seed
   ```

7. **Start the development server:**
   ```bash
   php artisan serve
   ```

8. **Access the application:**
   - Open browser to: http://127.0.0.1:8000

### 11.3 Default User Credentials

The system includes the following test users:

| Role | Email | Password |
|------|-------|----------|
| Admin | admin@stock.com | password |
| Manager | manager@stock.com | password |
| Staff | staff@stock.com | password |

## 12. System Features

### 12.1 Dashboard
- Overview statistics (total products, suppliers, warehouses, stock, orders)
- Low stock alerts
- Pending order tracking
- Recent purchase orders display

### 12.2 Category Management
- Create, read, update, delete categories
- Category descriptions
- Link products to categories

### 12.3 Supplier Management
- Manage supplier information
- Contact details tracking
- View supplier's purchase orders

### 12.4 Warehouse Management
- Multiple warehouse support
- Assign managers to warehouses
- Track warehouse capacity
- View stock per warehouse

### 12.5 Product Management
- Product catalog with SKU
- Pricing information
- Category assignment
- Stock levels across warehouses

### 12.6 Stock Management
- Track product quantities per warehouse
- Reorder level alerts
- Low stock indicators
- Stock status monitoring

### 12.7 Purchase Order Management
- Create orders with suppliers
- Assign to warehouses
- Track order status (pending, received, cancelled)
- View order items and totals

## 13. Validation Rules

The system implements comprehensive validation:

**Categories:**
- Name: required, max 255 characters
- Description: optional

**Suppliers:**
- Name: required, max 255 characters
- Contact Person: optional, max 255 characters
- Email: optional, valid email format
- Phone: optional, max 20 characters
- Address: optional

**Warehouses:**
- Name: required, max 255 characters
- Location: required, max 255 characters
- Capacity: required, integer, minimum 0
- Manager: optional, must exist in users table

**Products:**
- Name: required, max 255 characters
- SKU: required, max 50 characters, unique
- Description: optional
- Price: required, numeric, minimum 0
- Category: optional, must exist in categories table

**Stock:**
- Product: required, must exist in products table
- Warehouse: required, must exist in warehouses table
- Quantity: required, integer, minimum 0
- Reorder Level: required, integer, minimum 0
- Unique constraint on (product_id, warehouse_id)

**Purchase Orders:**
- Order Number: required, max 50 characters, unique
- Supplier: required, must exist in suppliers table
- Warehouse: required, must exist in warehouses table
- Order Date: required, valid date
- Expected Date: optional, valid date, must be after order date
- Status: required (pending, received, cancelled)
- Total Amount: required, numeric, minimum 0

## 14. Security Considerations

- CSRF protection enabled on all forms
- SQL injection prevention through Eloquent ORM
- Input validation on all user inputs
- Foreign key constraints to maintain data integrity
- Password hashing using bcrypt
- Role-based access (though not fully implemented in views)

## 15. Future Enhancements

Potential improvements for the system:

1. **Authentication & Authorization**
   - Implement Laravel Auth
   - Role-based access control
   - Permission system

2. **Advanced Features**
   - Stock transfer between warehouses
   - Automatic reorder notifications
   - Report generation (PDF/Excel)
   - Barcode/QR code scanning
   - Inventory adjustment logs
   - Supplier performance tracking

3. **User Interface**
   - Dashboard charts and graphs
   - Advanced filtering and search
   - Export functionality
   - Mobile-responsive design
   - Dark mode

4. **Integration**
   - Payment gateway integration
   - Email notifications
   - API endpoints for mobile app
   - Multi-currency support

## 16. Conclusion

The Stock Management System has been successfully implemented according to the assignment requirements. The system includes:

1. ✅ System overview and case study
2. ✅ User (stakeholder) analysis
3. ✅ Entity identification (strong and associative entities)
4. ✅ Entity attributes with primary and foreign keys
5. ✅ Relationship and cardinality analysis (1:1, 1:N, M:N)
6. ✅ Participation constraints (total and partial)
7. ✅ Relational database schema
8. ✅ SQL implementation through Laravel migrations
9. ✅ ERD-to-database mapping and relationship implementation
10. ✅ Referential integrity through foreign key constraints
11. ✅ Full CRUD functionality for all entities
12. ✅ Working web application with user interface

The system is fully functional and ready for demonstration. All database tables are properly normalized with appropriate relationships, foreign key constraints, and validation rules.
