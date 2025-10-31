table users {
  id primary
  name varchar
  email varchar
  password varchar
}

table categories {
  id primary
  name varchar
  slug varchar
  is_active boolean
}

Table tickets {
  id primary
  description text
  priority priority
  status status
  assigned_by int [ref: > users.id]
  assigned_to int [ref: > users.id]
}

table roles {
  id primary
  title varchar
}

table permissions {
  id primary
  title varchar
}

table permissions_role {
  permissions_id int [ref: > permissions.id]
  role_id ini [ref: > roles.id]
}

table role_user {
  role_id int [ref: > roles.id]
  user_id int [ref: > users.id]
}

enum priority {
  Low
  Medium
  High
}

enum status {
  Low
  Medium
  High
}

table category_ticket {
  category_id int [ref: > categories.id]
  ticket_id int [ref: > tickets.id]
}