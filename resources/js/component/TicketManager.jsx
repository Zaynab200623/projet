import React, { useState, useEffect } from 'react';
import axios from 'axios';

function TicketManager() {
    const [tickets, setTickets] = useState([]);

    useEffect(() => {
        fetchTickets();
    }, []);

    const fetchTickets = async () => {
        const response = await axios.get('/api/tickets');
        setTickets(response.data);
    };

    const handleDelete = async (id) => {
        await axios.delete(`/api/tickets/${id}`);
        fetchTickets();
    };

    const handleUpdate = async (id) => {
        const newTitle = prompt('New title:');
        if (newTitle) {
            await axios.put(`/api/tickets/${id}`, { title: newTitle });
            fetchTickets();
        }
    };

    return (
        <div className="container mt-5">
            <h2>Gestion des Tickets</h2>
            <ul className="list-group">
                {tickets.map(ticket => (
                    <li key={ticket.id} className="list-group-item d-flex justify-content-between align-items-center">
                        {ticket.title}
                        <div>
                            <button className="btn btn-sm btn-primary me-2" onClick={() => handleUpdate(ticket.id)}>Modifier</button>
                            <button className="btn btn-sm btn-danger" onClick={() => handleDelete(ticket.id)}>Supprimer</button>
                        </div>
                    </li>
                ))}
            </ul>
        </div>
    );
}

export default TicketManager;
