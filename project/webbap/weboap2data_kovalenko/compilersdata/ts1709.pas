program NSD_rec;
        var n,m,f:longint;
function NOD(a,b:longint):integer;
begin
     if a=b then NOD:=a
        else
            if a<b then NOD:=NOD(a,b-a)
                        else NOD:=NOD(a-b,b);
end;
begin
       read(a,b);
	f:=nod(n,m);
     write(f);
end.