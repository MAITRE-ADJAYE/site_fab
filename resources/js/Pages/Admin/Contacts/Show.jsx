import React from 'react';
import { Link } from '@inertiajs/inertia-react';

const Show = ({ contact }) => {
  return (
    <div className="container mx-auto p-4">
      <h1 className="text-2xl font-bold mb-4">Détails du Contact</h1>
      <div className="bg-white p-6 rounded-lg shadow-md">
        <p><strong className="font-semibold">Texte :</strong> {contact.text}</p>
        <p><strong className="font-semibold">Horaire :</strong> {contact.horaire}</p>
        <p><strong className="font-semibold">Localisation :</strong> {contact.localisation}</p>
      </div>
      <Link
        href="/admin/contacts"
        className="mt-4 inline-block border border-gray-500 text-gray-500 hover:bg-gray-500 hover:text-white font-bold py-2 px-4 rounded"
      >
        Retour
      </Link>
    </div>
  );
};

export default Show;
