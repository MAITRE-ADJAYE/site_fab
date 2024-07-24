// resources/js/Pages/Contacts/Create.jsx
import React, { useState } from 'react';
import { Inertia } from '@inertiajs/inertia';
import 'bootstrap/dist/css/bootstrap.min.css';

const Create = () => {
    const [formData, setFormData] = useState({
        text: '',
        horaire: '',
        localisation: '',
        date: '',
        adresse: ''
    });

    const handleChange = (e) => {
        setFormData({ ...formData, [e.target.name]: e.target.value });
    };

    const handleSubmit = (e) => {
        e.preventDefault();
        Inertia.post('/admin/contacts', formData); // Notez le préfixe '/admin'
        resetForm();
    };

    const resetForm = () => {
        setFormData({
            text: '',
            horaire: '',
            localisation: '',
            date: '',
            adresse: ''
        });
    };

    return (
        <div className="container py-4">
            <h1 className="mb-4">Créer un Contact</h1>
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
                <button type="submit" className="btn btn-primary">Ajouter</button>
                <button type="button" className="btn btn-secondary" onClick={resetForm}>Annuler</button>
            </form>
        </div>
    );
};

export default Create;
