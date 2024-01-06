Enum sizes_pets{
  pequeno
  medio
  grande
  gigante
}

Table races {
   id serial [primary key]
   name varchar(50) [not null, unique]
   created_at timestamp [default: `now()`]
}

Table pets {
  id serial [primary key]
  race_id integer [not null]
  client_id integer [not null]
  name varchar(150) [not null]
  age integer
  weight float
  size sizes_pets 
  created_at timestamp [default: `now()`]
}

Table peoples {
  id serial [primary key]
  name varchar(150) [not null]
  cpf varchar(20) 
  contact varchar(20)
  created_at timestamp [default: `now()`]
}

Table clients {
  id serial [primary key]
  people_id integer 
  created_at timestamp [default: `now()`]
}

Table vaccines {
    id serial [primary key]
    dose float [not null]
    professional_id integer [not null]
    pet_id integer [not null]
    created_at timestamp [default: `now()`]
}

Table professionals {
  id serial [primary key]
  people_id integer  [not null]
  specialty varchar(50) [not null]
  register varchar(20) 
  created_at timestamp [default: `now()`]
}

Ref: races.id > pets.race_id
Ref: clients.id < pets.client_id
Ref: peoples.id - clients.people_id
Ref: peoples.id - professionals.people_id
Ref: vaccines.professional_id > professionals.id
Ref: vaccines.pet_id > pets.id



