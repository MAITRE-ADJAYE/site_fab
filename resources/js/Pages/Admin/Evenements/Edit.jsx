import React, { useState, useEffect } from 'react';
import { Inertia } from '@inertiajs/inertia';
import 'bootstrap/dist/css/bootstrap.min.css';

const EditEvenement = ({ evenement }) => {
    const [formData, setFormData] = useState({
        image: evenement.image,
        titre: evenement.titre,
        description: evenement.description,
        date: evenement.date
    });
    const [imagePreview, setImagePreview] = useState(evenement.image);

    const handleChange = (e) => {
        if (e.target.type === 'file') {
            setFormData({ ...formData, [e.target.name]: e.target.files[0] });
            setImagePreview(URL.createObjectURL(e.target.files[0]));
        } else {
            setFormData({ ...formData, [e.target.name]: e.target.value });
        }
    };

    const handleSubmit = (e) => {
        e.preventDefault();

        const formDataWithImage = new FormData();
        formDataWithImage.append('image', formData.image);
        formDataWithImage.append('titre', formData.titre);
        formDataWithImage.append('description', formData.description);
        formDataWithImage.append('date', formData.date);

        Inertia.put(`/admin/evenements/${evenement.id}`, formDataWithImage, {
            headers: {
                'Content-Type': 'multipart/form-data',
            }
        });
    };

    return (
        <div className="container py-4">
            <h1 className="mb-4">Modifier un Événement</h1>

            {/* Formulaire */}
            <form onSubmit={handleSubmit} className="mb-4">
                <div className="mb-3">
                    <label htmlFor="image" className="form-label">Image</label>
                    <input type="file" className="form-control" id="image" name="image" onChange={handleChange} accept="image/*" />
                </div>
                {imagePreview && (
                    <div className="mb-3">
                        <img src={imagePreview} alt="Preview" className="img-thumbnail" />
                    </div>
                )}
                <div className="mb-3">
                    <label htmlFor="titre" className="form-label">Titre</label>
                    <input type="text" className="form-control" id="titre" name="titre" placeholder="Titre" value={formData.titre} onChange={handleChange} required />
                </div>
                <div className="mb-3">
                    <label htmlFor="description" className="form-label">Description</label>
                    <textarea className="form-control" id="description" name="description" placeholder="Description" value={formData.description} onChange={handleChange} required />
                </div>
                <div className="mb-3">
                    <label htmlFor="date" className="form-label">Date</label>
                    <input type="date" className="form-control" id="date" name="date" placeholder="Date" value={formData.date} onChange={handleChange} required />
                </div>
                <button type="submit" className="btn btn-primary me-2">Modifier</button>
            </form>
        </div>
    );
};

export default EditEvenement;
