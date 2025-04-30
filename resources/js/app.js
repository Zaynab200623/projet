import './bootstrap';
import React from 'react';
import { createRoot } from 'react-dom/client';
import TicketManager from './components/TicketManager';

const ticketManagerDiv = document.getElementById('ticket-manager');
if (ticketManagerDiv) {
    createRoot(ticketManagerDiv).render(<TicketManager />);
}
