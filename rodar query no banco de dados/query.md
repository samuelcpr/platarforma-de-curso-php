

``DROP TABLE IF EXISTS videos;``

``CREATE TABLE videos (``
    ``id SERIAL PRIMARY KEY,``
    ``title VARCHAR(255) NOT NULL,``
    ``description TEXT,``
    ``file_path VARCHAR(255) NOT NULL,``
    ``created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,``
  ``  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP``
``);``

``CREATE OR REPLACE FUNCTION update_updated_at_column()``
``RETURNS TRIGGER AS $$``
``BEGIN``
    ``NEW.updated_at = CURRENT_TIMESTAMP;``
    ``RETURN NEW;``
``END;``
``$$ LANGUAGE plpgsql;``

``CREATE TRIGGER update_videos_updated_at``
``BEFORE UPDATE ON videos``
``FOR EACH ROW``
``EXECUTE FUNCTION update_updated_at_column();``

``GRANT ALL PRIVILEGES ON TABLE videos TO admin;``
