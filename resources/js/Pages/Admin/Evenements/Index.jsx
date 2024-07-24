import React, { useState, useEffect } from 'react';
import { Inertia } from '@inertiajs/inertia';
import 'bootstrap/dist/css/bootstrap.min.css';

const Evenements = ({ evenements }) => {
    const [formData, setFormData] = useState({
        image: null,
        titre: '',
        description: '',
        date: ''
    });
    const [imagePreview, setImagePreview] = useState(null);
    const [editMode, setEditMode] = useState(false);
    const [currentId, setCurrentId] = useState(null);

    useEffect(() => {
        if (formData.image) {
            setImagePreview(URL.createObjectURL(formData.image));
        }
    }, [formData.image]);

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
        formDataWithImage.append('photo', formData.image);
        formDataWithImage.append('titre', formData.titre);
        formDataWithImage.append('description', formData.description);
        formDataWithImage.append('date', formData.date);

        if (editMode && currentId) {
            formDataWithImage.append('_method', 'PUT');
            Inertia.post(`/admin/evenements/${currentId}`, formDataWithImage, {
                headers: {
                    'Content-Type': 'multipart/form-data',
                }
            });
        } else {
            Inertia.post('/admin/evenements', formDataWithImage, {
                headers: {
                    'Content-Type': 'multipart/form-data',
                }
            });
        }
        resetForm();
    };

    const handleEdit = (evenement) => {
        setFormData({
            image: null,
            titre: evenement.titre,
            description: evenement.description,
            date: evenement.date
        });
        setImagePreview(evenement.image);
        setEditMode(true);
        setCurrentId(evenement.id);
    };

    const handleDelete = (id) => {
        if (window.confirm('Êtes-vous sûr de vouloir supprimer cet événement ?')) {
            Inertia.post(`/admin/evenements/${id}`, { _method: 'DELETE' });
        }
    };

    const resetForm = () => {
        setFormData({
            image: null,
            titre: '',
            description: '',
            date: ''
        });
        setImagePreview(null);
        setEditMode(false);
        setCurrentId(null);
    };

    return (
        <div className="container py-4">
            <h1 className="mb-4">Événements</h1>

            {/* Formulaire */}
            <form onSubmit={handleSubmit} className="mb-4">
                <div className="mb-3">
                    <label htmlFor="image" className="form-label">Image</label>
                    <input type="file" className="form-control" id="image" name="image" onChange={handleChange} accept="image/*" required={!editMode} />
                </div>
                {imagePreview && (
                    <div className="mb-3">
                        <img src={imagePreview} alt="Aperçu" className="img-thumbnail" />
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
                <button type="submit" className="btn btn-primary me-2">{editMode ? 'Modifier' : 'Ajouter'}</button>
                {editMode && (
                    <button type="button" className="btn btn-secondary" onClick={resetForm}>Annuler</button>
                )}
            </form>

            {/* Liste d'événements */}
            <ul className="list-group">
                {evenements.map(evenement => (
                    <li key={evenement.id} className="list-group-item d-flex justify-content-between align-items-center">
                        <div>
                            <h5>{evenement.titre}</h5>
                            <p>{evenement.description}</p>
                            <p>Date: {evenement.date}</p>
                            {evenement.image && (
                                <div className="mb-3">
                                    <img src={evenement.image} alt="Image de l'événement" className="img-thumbnail" />
                                </div>
                            )}
                        </div>
                        <div>
                            <button className="btn btn-sm btn-warning me-2" onClick={() => handleEdit(evenement)}>Modifier</button>
                            <button className="btn btn-sm btn-danger" onClick={() => handleDelete(evenement.id)}>Supprimer</button>
                        </div>
                    </li>
                ))}
            </ul>
        </div>
    );
};

export default Evenements;
