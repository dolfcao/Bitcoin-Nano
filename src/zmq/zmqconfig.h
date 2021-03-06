// Copyright (c) 2014 The Btcnano Core developers
// Distributed under the MIT software license, see the accompanying
// file COPYING or http://www.opensource.org/licenses/mit-license.php.

#ifndef BTCNANO_ZMQ_ZMQCONFIG_H
#define BTCNANO_ZMQ_ZMQCONFIG_H

#if defined(HAVE_CONFIG_H)
#include "config/btcnano-config.h"
#endif

#include <string>

#if ENABLE_ZMQ
#include <zmq.h>
#endif

#include "primitives/block.h"
#include "primitives/transaction.h"

void zmqError(const char *str);

#endif // BTCNANO_ZMQ_ZMQCONFIG_H
