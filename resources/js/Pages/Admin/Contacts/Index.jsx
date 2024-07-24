// resources/js/Pages/Contacts/Index.jsx
import React, { useState } from 'react';
import { Inertia } from '@inertiajs/inertia';
import 'bootstrap/dist/css/bootstrap.min.css';

const Index = ({ contacts }) => {
    const [formData, setFormData] = useState({
        text: '',
        horaire: '',
        localisation: '',
        date: '',
        adresse: ''
    });
    const [editMode, setEditMode] = useState(false);
    const [currentId, setCurrentId] = useState(null);

    const handleChange = (e) => {
        setFormData({ ...formData, [e.target.name]: e.target.value });
    };

    const handleSubmit = (e) => {
        e.preventDefault();

        if (editMode && currentId) {
            Inertia.put(`/admin/contacts/${currentId}`, formData);
        } else {
            Inertia.post('/admin/contacts', formData);
        }
        resetForm();
    };

    const handleEdit = (contact) => {
        setFormData({
            text: contact.text,
            horaire: contact.horaire,
            localisation: contact.localisation,
            date: contact.date,
            adresse: contact.adresse
        });
        setEditMode(true);
        setCurrentId(contact.id);
    };

    const handleDelete = (id) => {
        if (window.confirm('Êtes-vous sûr de vouloir supprimer ce contact ?')) {
            Inertia.delete(`/admin/contacts/${id}`);
        }
    };

    const resetForm = () => {
        setFormData({
            text: '',
            horaire: '',
            localisation: '',
            date: '',
            adresse: ''
        });
        setEditMode(false);
        setCurrentId(null);
    };

    return (
        <div className="container py-4">
            <h1 className="mb-4">Contacts</h1>

            <form onSubmit={handleSubmit} className="mb-4">
                <div className="mb-3">
                    <label htmlFor="text" className="form-label">Texte</label>
                    <input type="text" className="form-control" id="text" name="text" value={formData.text} onChange={handleChange} required />
                </div>
                <div className="mb-3">
                    <label htmlFor="horaire" className="form-label">Horaire</label>
                    <input type="text" className="form-control" id="horaire" name="horaire" value={formData.horaire} onChange={handleChange} />
                </div>
                <div className="mb-3">
                    <label htmlFor="localisation" className="form-label">Localisation</label>
                    <input type="text" className="form-control" id="localisation" name="localisation" value={formData.localisation} onChange={handleChange} required />
                </div>
                <div className="mb-3">
                    <label htmlFor="date" className="form-label">Date</label>
                    <input type="date" className="form-control" id="date" name="date" value={formData.date} onChange={handleChange} />
                </div>
                <div className="mb-3">
                    <label htmlFor="adresse" className="form-label">Adresse</label>
                    <input type="text" className="form-control" id="adresse" name="adresse" value={formData.adresse} onChange={handleChange} />
                </div>
                <button type="submit" className="btn btn-primary">{editMode ? 'Modifier' : 'Ajouter'}</button>
                {editMode && (
                    <button type="button" className="btn btn-secondary" onClick={resetForm}>Annuler</button>
                )}
            </form>

            <ul className="list-group">
                {contacts.map(contact => (
                    <li key={contact.id} className="list-group-item d-flex justify-content-between align-items-center">
                        <div>
                            <h5>{contact.text}</h5>
                            <p>Horaire: {contact.horaire}</p>
                            <p>Localisation: {contact.localisation}</p>
                            <p>Date: {contact.date}</p>
                            <p>Adresse: {contact.adresse}</p>
                        </div>
                        <div>
                            <button className="btn btn-sm btn-warning me-2" onClick={() => handleEdit(contact)}>Modifier</button>
                            <button className="btn btn-sm btn-danger" onClick={() => handleDelete(contact.id)}>Supprimer</button>
                        </div>
                    </li>
                ))}
            </ul>
        </div>
    );
};

export default Index;
