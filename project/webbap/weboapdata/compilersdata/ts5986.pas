program t3z36;
var n,m:integer;
    a,b,z:array[1..100] of real;
    c,d:array[1..100] of real;
    i,j,q:integer;
    minA,minB:real;
    minNumA,minNumB:integer;

procedure Amin;
begin
    minA:=a[1];
    minNumA:=1;
    for n:=2 to i do
      if minA=a[n] then
       minNumA:=minNumA;
      if minA>a[n] then
      begin
          minA:=a[n];
          minNumA:=n;
      end;
end;

procedure Bmin;
begin
    minB:=b[1];
    minNumB:=1;
    for m:=2 to j do
      if minB=b[m] then
       minNumB:=minNumB;
      if minB>b[m] then
      begin
          minB:=b[m];
          minNumB:=m;
      end
    else
    if minB=b[m] then
       minNumB:=minNumB;
end;


procedure AnCn;
begin
    Amin;
    for n:=1 to minNumA do
      c[n]:=a[n];
    for n:=(minNumA+1) to i do
      c[n]:=21.05
end;

procedure BmDm;
begin
    Bmin;
    for m:=1 to minNumB do
      d[m]:=b[m];
    for m:=(minNumB+1) to j do
      d[m]:=21.05
end;

begin
    readln(n,m);

    i:=n;
    j:=m;

    for n:=1 to i do
      read(a[n]);
    for m:=1 to j do
      read(b[m]);

    Amin;
    Bmin;
    AnCn;
    BmDm;

    for n:=1 to i do
      write(c[n]:0:2,);
    for m:=1 to j do
      write(d[m]:0:2,);
readln;
end.
