BEGIN;

CREATE TABLE warehouse.public.warehouses
(
  id INTEGER PRIMARY KEY,
  name TEXT NOT NULL,
  address_street TEXT NOT NULL,
  address_city TEXT NOT NULL,
  address_state TEXT,
  address_zip TEXT NOT NULL,
  address_country TEXT NOT NULL
);

CREATE TABLE warehouse.public.boxes
(
  id INTEGER PRIMARY KEY,
  barcode TEXT NOT NULL,
  width REAL NOT NULL,
  height REAL NOT NULL,
  length REAL NOT NULL,
  status INTEGER NOT NULL,
  dislocation_warehouse_id INTEGER NOT NULL,
  FOREIGN KEY (dislocation_warehouse_id) REFERENCES warehouses (id)
);

CREATE TABLE warehouse.public.transfer_requests
(
  id INTEGER PRIMARY KEY,
  sender_id INTEGER NOT NULL,
  receiver_id INTEGER NOT NULL,
  reference_number TEXT NOT NULL,
  ts_created TIMESTAMPTZ NOT NULL,
  ts_updated TIMESTAMPTZ NOT NULL DEFAULT NOW(),
  status INTEGER NOT NULL,
  FOREIGN KEY (receiver_id) REFERENCES warehouses (id),
  FOREIGN KEY (sender_id) REFERENCES warehouses (id)
);

CREATE TABLE warehouse.public.transfer_accepts
(
  id INTEGER PRIMARY KEY,
  sender_id INTEGER NOT NULL,
  receiver_id INTEGER NOT NULL,
  reference_number TEXT NOT NULL,
  ts_created TIMESTAMPTZ NOT NULL,
  ts_updated TIMESTAMPTZ NOT NULL DEFAULT NOW(),
  status INTEGER NOT NULL,
  FOREIGN KEY (receiver_id) REFERENCES warehouses (id),
  FOREIGN KEY (sender_id) REFERENCES warehouses (id)
);

CREATE TABLE warehouse.public.transfer_items
(
  id INTEGER PRIMARY KEY,
  transfer_request_id INTEGER NOT NULL,
  transfer_accept_id INTEGER NOT NULL,
  box_id INTEGER NOT NULL,
  status INTEGER NOT NULL,
  UNIQUE (box_id, status),
  UNIQUE (transfer_request_id, box_id),
  UNIQUE (transfer_accept_id, box_id),
  FOREIGN KEY (transfer_request_id) REFERENCES transfer_requests (id),
  FOREIGN KEY (transfer_accept_id) REFERENCES transfer_accepts (id),
  FOREIGN KEY (box_id) REFERENCES boxes (id)
);

CREATE UNIQUE INDEX boxes_barcode_uindex ON warehouse.public.boxes (barcode);
CREATE UNIQUE INDEX warehouses_name_uindex ON warehouse.public.warehouses (name);
CREATE UNIQUE INDEX transfer_requests_reference_number_uindex ON warehouse.public.transfer_requests (reference_number);
CREATE UNIQUE INDEX transfer_accepts_reference_number_uindex ON warehouse.public.transfer_accepts (reference_number);

COMMIT;