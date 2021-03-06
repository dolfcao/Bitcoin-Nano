// Copyright (c) 2009-2010 Satoshi Nakamoto
// Copyright (c) 2009-2016 The Btcnano Core developers
// Distributed under the MIT software license, see the accompanying
// file COPYING or http://www.opensource.org/licenses/mit-license.php.

#ifndef BTCNANO_WARNINGS_H
#define BTCNANO_WARNINGS_H

#include <cstdlib>
#include <string>

void SetMiscWarning(const std::string &strWarning);
void SetfLargeWorkForkFound(bool flag);
bool GetfLargeWorkForkFound();
void SetfLargeWorkInvalidChainFound(bool flag);
bool GetfLargeWorkInvalidChainFound();
std::string GetWarnings(const std::string &strFor);

static const bool DEFAULT_TESTSAFEMODE = false;

#endif //  BTCNANO_WARNINGS_H
