// resources/js/Pages/Contacts/Edit.jsx
import React, { useState } from 'react';
import { Inertia } from '@inertiajs/inertia';
import 'bootstrap/dist/css/bootstrap.min.css';

const Edit = ({ contact }) => {
    const [formData, setFormData] = useState({
        text: contact.text,
        horaire: contact.horaire,
        localisation: contact.localisation,
        date: contact.date,
        adresse: contact.adresse
    });

    const handleChange = (e) => {
        setFormData({ ...formData, [e.target.name]: e.target.value });
    };

    const handleSubmit = (e) => {
        e.preventDefault();
        Inertia.put(`/admin/contacts/${contact.id}`, formData); // Notez le préfixe '/admin'
    };

    return (
        <div className="container py-4">
            <h1 className="mb-4">Modifier un Contact</h1>
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
                <button type="submit" className="btn btn-primary">Modifier</button>
            </form>
        </div>
    );
};

export default Edit;
